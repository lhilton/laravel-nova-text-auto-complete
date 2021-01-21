<template>
    <default-field :errors="errors" :field="field" :show-help-text="showHelpText" class="lh-text-auto-complete">
        <template slot="field">
            <vue-suggestion
                    :id="field.name"
                    v-model="item"
                    :itemTemplate="itemTemplate"
                    :items="items"
                    :placeholder="field.name"
                    :setLabel="setLabel"
                    :minLen="1"
                    inputClasses="w-full form-control form-input form-input-bordered"
                    @changed="inputChange"
                    @selected="itemSelected"
                    autocomplete="off">
            </vue-suggestion>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import itemTemplate from './ItemTemplate.vue'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    data () {
        return {
            item: {},
            items: [],
            itemTemplate,
        }
    },

    watch: {
        item: {
            deep: true,
            handler () {
                this.value = this.item.name || this.value
            },
        },
    },

    methods: {
        setInitialValue () {
            this.value = this.field.value || ''
            this.item = { id: 0, name: this.value }
        },
        itemSelected (item) {
            this.item = item
        },
        setLabel (item) {
            return item.name
        },
        inputChange (text) {
            this.value = text
            this.items = this.field.items.filter(item => item.toLowerCase().includes(text.toLowerCase())).
                map((obj, idx) => ({ id: idx, name: obj }))
        },
    },
}
</script>