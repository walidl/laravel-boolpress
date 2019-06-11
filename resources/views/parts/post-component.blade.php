<script type="text/x-template" id='post-template'>

  <div class="col-md-12 col-lg-6" id="post-template">
    <div class="card post position-relative flex-md-column mb-4 shadow-sm h-md-250">

      <div class="card-header  d-flex  align-items-center px-3 py-2">
        <h3 class="mb-0">
          <p class=" text-dark mb-0"> @{{title}}</p>
        </h3>


      </div>

      <div class="card-content d-flex flex-column align-items-start">
        <div class="mb-2 info   border-bottom px-3 py-1 d-flex justify-content-between">
          <div>
            <small class="mb-1 text-muted mr-2">@{{createdAt}}</small>|
            <small > By <a href="#">@{{userName}}</a> </small>
          </div>
          <div>
            <a  v-for="category in categories"  v-bind:style="{ 'background-color': category.name }" v-bind:href="'<?php echo env("APP_URL");?>/category/' + category.name" class="d-inline-block px-1 category ml-1" ><strong >@{{ category.name }}</strong></a>
          </div>
        </div>
        <p class="preview mb-auto px-3">@{{ preview }}</p>
      </div>
      <div class=" card-footer border-0  d-flex justify-content-between links">

        <a  v-bind:href="'<?php echo env("APP_URL");?>/post/' + postId">Continue reading</a>

        <a  v-if="isLogged" v-bind:href="'<?php echo env("APP_URL");?>/admin/post/edit/' + postId">Edit</a>

      </div>

    </div>
  </div>
</script>
