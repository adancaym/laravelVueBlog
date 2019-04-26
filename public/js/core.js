const Core =
    {
        app : null,
        hash:null,
        hashchange :()=>{
            Core.app.changeModule(window.location.hash.substr(1));
        },
        processResponse:(response)=>{
            console.log(response)
        },
        clone(src) {
            return Object.assign({}, src);
        },
        crud:{
            dataCrud:{
                editMode:false,
                item:{}
            },
            methodsCrud:{
                edit(item){
                    this.editMode = true;
                    this.item = item
                },
                destroy(item){
                    axios.delete(this.module+'/'+item.id).then((response)=>{
                        if (response.status === 200 && response.data === 1){
                            this.$refs.tablePagination.getItems();
                        }
                    })
                },
                save(item){
                    axios.post(this.module,item).then((response)=>{
                        if (response.status === 200){
                            this.editMode = false;
                        }
                    });
                },
                exitEditMode(){
                    this.editMode = false;
                }
            }
        }
};