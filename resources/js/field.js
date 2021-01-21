import VueSuggestion from 'vue-suggestion'

Nova.booting((Vue, router, store) => {
    Vue.use(VueSuggestion)
    Vue.component('index-text-auto-complete',
        require('./components/IndexField'))
    Vue.component('detail-text-auto-complete',
        require('./components/DetailField'))
    Vue.component('form-text-auto-complete', require('./components/FormField'))
})
