const Core = {
    app : null,
    hash:null,
    hashchange :()=>{
      Core.app.changeModule(window.location.hash.substr(1));
  }
};