
<script type="text/x-template" id='mypost-template'>

  <transition name="bounce">

    <div class="card bg-light col-12 my-1 mypost" v-show="!deleted" >
      <div class="card-body d-flex justify-content-between">
        <div class=" d-flex">
          <a v-bind:href="'<?php echo env("APP_URL");?>/post/' + postId">
            <h5 class="m-0 mr-3 ">@{{title}}</h5>
          </a>
          <div class="">
            <a  v-for="category in categories"  v-bind:style="{ 'background-color': category.name }" v-bind:href="'<?php echo env("APP_URL");?>/category/' + category.name" class="d-inline-block px-1 category ml-1" ><strong >@{{ category.name }}</strong></a>

          </div>
        </div>

        <div class="">

          <a  class="mx-1 " v-bind:href="'<?php echo env("APP_URL");?>/admin/post/edit/' + postId"><i class="fas fa-edit"></i></a>
          <a  class="mx-1 " href="#"  @click="destroy()"><i class="fas fa-trash-alt"></i></a>

        </div>
      </div>
    </div>
  </transition>

</script>
