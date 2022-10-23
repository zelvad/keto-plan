<template>
    <div>
        <heading class="mb-6">{{ __('UI Translations') }}</heading>

        <div class="flex" style="">
            <div class="relative h-9 flex-no-shrink mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                     aria-labelledby="search" role="presentation"
                     class="fill-current absolute search-icon-center ml-3 text-70">
                    <path fill-rule="nonzero"
                          d="M14.32 12.906l5.387 5.387a1 1 0 0 1-1.414 1.414l-5.387-5.387a8 8 0 1 1 1.414-1.414zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                </svg>
                <input :placeholder="__('Search')" type="search" spellcheck="false" v-model="search"
                       class="appearance-none form-search w-search pl-search shadow"></div>
            <div class="w-full flex items-center mb-6">
                <div class="flex w-full justify-end items-center mx-3"></div>
                <div class="flex-no-shrink ml-auto">
                    <progress-button
                        @click.native="createTranslation"
                    >
                        {{ __('Add Translation') }}
                    </progress-button>
                    <progress-button
                        @click.native="seedTranslations"
                        :disabled="seeding"
                        :processing="seeding"
                    >
                        {{ __('Seed Translations') }}
                    </progress-button>
                </div>
            </div>
        </div>

        <card>
            <table class="w-full table mb-6 py-3 px-6 table-fixed">
                <thead>
                <tr>
                    <th class="text-right" style="width: 50px">{{ __('ID') }}</th>
                    <th class="text-left" style="width: 250px">{{ __('Key') }}</th>
                    <th class="text-left">{{ __('Translations') }}</th>
                    <th class="text-center" style="width: 100px">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="translation in filteredTranslations">
                    <td class="text-right" style="width: 50px">
                        {{ translation.id }}
                    </td>
                    <td class="text-left" style="width: 250px; overflow-x: hidden">
                        {{ translation.key }}
                    </td>
                    <td class="text-left">
                        <p v-if="value" v-for="(value, key) in translation.translations">
                            <strong>{{ key }}</strong>: {{ value }}
                        </p>
                    </td>
                    <td class="text-center" style="width: 100px">
                        <a
                            @click.prevent="editTranslation(translation)"
                            class="inline-flex cursor-pointer text-70 hover:text-primary"
                            v-tooltip.click="__('Edit')"
                        >
                            <icon type="edit"/>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </card>

        <modal v-if="editableTranslation" @modal-close="handleModalClose" tabindex="-1"
               role="dialog">
            <form
                autocomplete="off"
                @submit.prevent.stop="saveTranslation"
                class="bg-white rounded-lg shadow-lg overflow-hidden" style="min-width: 400px"
            >
                <div class="p-8">
                    <heading :level="2" class="border-b border-40 pt-0 pb-4">
                        <span v-if="editableTranslation.id">{{ __('Edit Translation') }}</span>
                        <span v-else>{{ __('Add Translation') }}</span>
                    </heading>

                    <div class="mt-4">
                        <label for="translation-key" class="inline-block text-80 leading-tight">{{ __('Key') }} <span class="text-danger text-sm">*</span></label>
                        <input type="text" id="translation-key" v-model="editableTranslation.key"
                               class="mt-2 w-full form-control form-input form-input-bordered">
                    </div>

                    <div class="mt-4">
                        <label for="translation-value-en" class="inline-block text-80 leading-tight">En</label>
                        <textarea type="text" id="translation-value-en" v-model="editableTranslation.translations.en"
                                  class="mt-2 w-full form-input h-auto min-h-90px form-control form-input-bordered py-4"></textarea>
                    </div>

                    <div class="mt-4">
                        <label for="translation-value-uk" class="inline-block text-80 leading-tight">Uk</label>
                        <textarea type="text" id="translation-value-uk" v-model="editableTranslation.translations.uk"
                                  class="mt-2 w-full form-input h-auto min-h-90px form-control form-input-bordered py-4"></textarea>
                    </div>
                </div>

                <div class="bg-30 px-6 py-3 flex">
                    <div class="flex items-center ml-auto">
                        <button
                            type="button"
                            @click.prevent="handleModalClose"
                            class="btn btn-link dim cursor-pointer text-80 ml-auto mr-6"
                        >
                            {{ __('Cancel') }}
                        </button>

                        <button
                            ref="runButton"
                            :disabled="saving"
                            type="submit"
                            class="btn btn-default btn-primary"
                        >
                            <loader v-if="saving" width="30"></loader>
                            <span v-else>{{ __('Save') }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </modal>
    </div>
</template>

<script>
export default {
    metaInfo() {
        return {
            title: this.__('UiTranslations'),
        }
    },
    data() {
        return {
            seeding: false,
            listing: false,
            saving: false,
            translations: [],
            editableTranslation: null,
            search: null,
        }
    },
    computed: {
        filteredTranslations() {
            return this.translations.filter((translation) => {
                if (!this.search) {
                    return true;
                }

                let search = this.search.toLowerCase();

                return JSON.stringify(translation).toLowerCase().indexOf(search) >= 0;
            });
        }
    },
    mounted() {
        this.listTranslations();
    },
    methods: {
        handleModalClose() {
            this.editableTranslation = null;
        },
        editTranslation(translation) {
            this.editableTranslation = Object.assign({}, translation);
        },
        createTranslation() {
            this.editableTranslation = {key: null, translations: {en: null, uk: null}};
        },
        saveTranslation() {
            this.saving = true;
            let method = this.editableTranslation.id ? 'put' : 'post';

            Nova.request()[method]('/nova-vendor/ui-translations/translations', this.editableTranslation).then((response) => {
                this.saving = false;
                this.editableTranslation = null;
                this.translations = response.data;
            }).catch((error) => {
                this.saving = false;

                this.$toasted.show(this.getErrorText(error), {type: 'error'});
            });
        },
        listTranslations() {
            this.listing = true;

            Nova.request().get('/nova-vendor/ui-translations/translations').then((response) => {
                this.listing = false;
                this.translations = response.data;
            });
        },
        seedTranslations() {
            this.seeding = true;

            Nova.request().post('/nova-vendor/ui-translations/seed-translations').then(() => {
                this.$toasted.show('Translations have been seeded!', {type: 'success'});
                this.seeding = false;
                this.listTranslations();
            });
        },
        getErrorText(error) {
            let result = '';

            for (const [key, value] of Object.entries(error.response.data.errors)) {
                result += value.join('<br/>');
            }

            return result;
        }
    }
}
</script>

<style>
/* Scoped Styles */
</style>
