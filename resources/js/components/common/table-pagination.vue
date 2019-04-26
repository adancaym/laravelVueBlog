
<template>
    <b-container>
        <h3>
            {{name}}
        </h3>
        <div v-if="items.length > 0">
            <b-table  small striped hover :items="filtered" :fields="fields" :current-page="current_page" :per-page="per_page" >
                <template slot="top-row" slot-scope="{ fields }">
                    <td v-for="field in fields" :key="field.key">
                        <b-input v-model="filters[field.key]" v-if="field.key in filters " :placeholder="field.label" />
                    </td>
                </template>
                <template slot="actions" slot-scope="row">

                    <table-actions
                            @edit="edit"
                            @destroy="destroy"
                            :item="row.item"
                    ></table-actions>
                </template>
            </b-table>
            <b-row>
                <div class="col-6 text-left">
                    <b-button variant="primary">Total mostrados: {{filtered.length}}</b-button>
                </div>
                <div class="col-6 text-right">
                    <b-pagination :total-rows="filtered.length" :per-page="per_page" v-model="current_page" align="right"/>
                </div>
            </b-row>
        </div>
        <div class="alert alert-danger" v-if="items.length === 0 && !loading" variant="danger">
            No existen registros!
        </div>
        <div class="text-center" v-if="loading">
            <b-spinner variant="light" type="grow"
                       style="width: 50rem; height: 50rem;"
            ></b-spinner>
        </div>
    </b-container>
</template>

<script>
    export default {
        props:['module'],
        name: "table-pagination",
        component:{
        },
        data(){
            return {
                items:[],
                per_page:10,
                current_page:1,
                fields:[],
                name:'',
                loading: true,
                filters:[],
            }
        },
        mounted() {
            this.getItems();
        },methods:{
            edit(item){
                this.$emit('edit',item);
            },
            destroy(item){
                this.loading = true;
                this.$emit('destroy',item);
            },
            getItems(){
                axios.get(this.module).then((response)=>{
                    this.items = response.data.items;
                    this.fields = response.data.fields;
                    this.name = response.data.name;
                    this.filters = response.data.filters;
                    this.loading = false;
                }).catch(Core.processResponse);
            }
        },
        computed: {
            filtered () {
                const filtered = this.items.filter(item => {
                    return Object.keys(this.filters).every(key =>
                        String(item[key]).includes(this.filters[key]))
                });
                return filtered.length > 0 ? filtered : [{}];
            }
        }
    }
</script>

<style scoped>

</style>