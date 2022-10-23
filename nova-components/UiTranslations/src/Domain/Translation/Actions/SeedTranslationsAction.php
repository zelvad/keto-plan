<?php

namespace Scalemeup\UiTranslations\Domain\Translation\Actions;

use Scalemeup\UiTranslations\Domain\Translation\Models\NovaUiTranslation;

class SeedTranslationsAction
{
    private string $seedingModule;

    public function execute(): void
    {
        $translationPaths = [
            'app' => base_path('resources/lang'),
            'nova' => base_path('resources/lang/vendor/nova'),
        ];

        foreach ($translationPaths as $module => $path) {
            $this->seedingModule = $module;

            $filesAndDirectories = array_diff(scandir($path), ['.', '..']);
            $jsonTranslations = array_filter($filesAndDirectories, fn ($file) => is_file($path.'/'.$file));
            $phpTranslations = array_filter(
                $filesAndDirectories,
                fn ($directory) => ! is_file($path.'/'.$directory) && $directory !== 'vendor'
            );

            $this->seedPhpTranslations($phpTranslations, $path);
            $this->seedJsonTranslations($jsonTranslations, $path);
        }
    }

    private function createPhpLanguageLines(string $language, string $group, array $translations): void
    {
        foreach ($translations as $key => $value) {
            if (is_array($value)) {
                $this->createPhpLanguageLines($language, $group.'.'.$key, $value);
                continue;
            }

            $this->createOrUpdateLanguageLine($language, $group.'.'.$key, $value);
        }
    }

    private function createOrUpdateLanguageLine(string $languageCode, string $key, string $value): void
    {
        $languageLine = NovaUiTranslation::firstOrCreate(
            ['key' => $key],
            ['translations' => [], 'module' => $this->seedingModule],
        );

        if (! empty($languageLine->translations[$languageCode])) {
            return;
        }

        $updatedTranslations = $languageLine->translations;
        $updatedTranslations[$languageCode] = $value;
        $languageLine->translations = $updatedTranslations;

        $languageLine->save();
    }

    private function seedPhpTranslations(array $phpTranslations, mixed $path): void
    {
        foreach ($phpTranslations as $translationDirectory) {
            $translationDirectoryPath = $path.'/'.$translationDirectory;
            $phpFiles = array_filter(
                array_diff(scandir($translationDirectoryPath), ['.', '..']),
                fn ($file) => is_file($translationDirectoryPath.'/'.$file) && str_ends_with($file, '.php')
            );

            foreach ($phpFiles as $phpFile) {
                $phpGroup = explode('.php', $phpFile)[0];
                $phpLanguageLines = include $translationDirectoryPath.'/'.$phpFile;

                $this->createPhpLanguageLines($translationDirectory, $phpGroup, $phpLanguageLines);
            }
        }
    }

    private function seedJsonTranslations(array $jsonTranslations, mixed $path): void
    {
        foreach ($jsonTranslations as $translationFile) {
            $translationFilePath = $path.'/'.$translationFile;
            $translations = json_decode(file_get_contents($translationFilePath), true);
            $languageCode = explode('.', $translationFile)[0];

            foreach ($translations as $key => $value) {
                $this->createOrUpdateLanguageLine($languageCode, $key, $value);
            }
        }
    }
}
