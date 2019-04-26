<template>

    <b-button-group>
        <b-button size="sm" class="btn" variant="warning" v-on:click.prevent="edit">
            <i class="fa fa-edit"></i>
        </b-button>
        <b-button size="sm" class="btn" variant="danger" v-on:click.prevent="destroy">

            <i class="fa fa-trash"></i>
        </b-button>
    </b-button-group>
</template>

<script>
    export default {
        props:['item'],
        name: "table-actions",
        methods:{
            edit(){
                this.$emit('edit',this.item);
            },
            destroy(){
                bootbox.confirm('¿Realmente deseas borrar el elemento?',(result)=>{
                    if (result) this.$emit('destroy',this.item);
                });
            }
        }
    }
</script>

<style scoped>

</style>