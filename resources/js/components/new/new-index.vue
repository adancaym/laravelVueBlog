<template>
    <b-container>
        <h3>
            holi soy el index noticias
        </h3>
        <h3 v-if="items.length == 0">
            Lo siento no tenemos resultados
        </h3>
        <b-table striped hover small :items="items"></b-table>
    </b-container>
</template>

<script>
    export default {
        props:['module'],
        name: "new-index",
        data(){
            return {
                items:[],
            }
        },
        mounted() {
            axios.get(this.module).then((response)=>{
                this.items = response.data.data;
            });
        }
    }
</script>

<style scoped>

</style>