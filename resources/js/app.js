

require('./bootstrap');

window.Vue = require('vue');


function alertFade(){

  var alert = $(".temp-alert");

  setTimeout(function(){ alert.fadeOut(300); }, 1500);

}

function init(){

  token = $('meta[name="csrf-token"]').attr('content');
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token;

  Vue.component('post-card',{

    template: '#post-template',
    props: {

      postId: String,
      categories: Array,
      title: String,
      body: String,
      createdAt: String,
      preview: String,
      userName: String,
      isLogged: String,

    },

  })


  Vue.component('mypost-card',{

      template: '#mypost-template',
      data: function() {
        return {

          deleted: false,
        }
      },
      props: {

        postId: String,
        categories: Array,
        title: String,

      },

      methods: {


        destroy() {

          axios.delete('/admin/myposts/destroy/' + this.postId)
          .then((response) => {
            this.deleted = true;
            console.log("ok");
          }).catch((error) => {
            console.log(error.response.data);
          });
          this.deleted = true;
        }
      }

    })

  const posts = new Vue({

    el: '#posts',

  })

  const post = new Vue({

    el: '#myposts',
  })

  alertFade();

}

$(document).ready(init);
