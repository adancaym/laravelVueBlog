<template>
    <div>
        <b-form @submit="onSubmit">
            <b-form-group
                    id="input-group-1"
                    label="Titulo:"
                    label-for="input-1"
                    description="We'll never share your email with anyone else."
            >
                <b-form-input
                        id="input-1"
                        v-model="item.title"
                        type="text"
                        required
                        placeholder="Titulo"
                />
            </b-form-group>

            <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
                <b-form-input
                        id="input-2"
                        v-model="item.contents"
                        placeholder="Contenido"
                ></b-form-input>
            </b-form-group>
            <b-button type="submit" variant="primary">Guardar</b-button>
            <b-button v-on:click.prevent="exitEditMode" variant="danger">Cancelar</b-button>
        </b-form>

    </div>
</template>

<script>
    export default {
        props:['item'],
        methods: {
            onSubmit(evt) {
                evt.preventDefault()
                this.$emit('save',this.item);
            },
            exitEditMode(){
                this.$emit('exitEditMode',null);
            }
        }
    }
</script>