Nova.booting((Vue, router) => {
  router.addRoutes([
    {
      name: 'ui-translations',
      path: '/ui-translations',
      component: require('./components/Tool'),
    },
  ])
})
