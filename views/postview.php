%% views/header.html %%

<div class="row">
  <div class="col-lg-12">
    <p>Posted on: {{ time2str($post['datestamp']) }}</p>
    <p>Filed under: {{$post['tags']}}</p>
    <h1>{{$post['title']}}</h1>
    <!-- Do something with $post here -->
    <p>{{{nl2br(htmlentities($post['content']))}}}</p>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="btn-toolbar align-middle">
      <button class="btn btn-sm btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="get('/index.php')"><span class="material-icons"><span class="material-symbols-outlined">arrow_back</span></span>&nbsp;Back</button>
      <button class="btn btn-sm btn-primary mr-1 d-flex justify-content-center align-content-between" onclick="get('/post/edit/{{$post['id']}}')"><span class="material-icons">edit</span>&nbsp;Edit</button>
      <button class="btn btn-sm btn-danger mr-1 d-flex justify-content-center align-content-between" onclick="get('/post/delete/{{$post['id']}}')"><span class="material-icons">delete</span>&nbsp;Delete</button>
    </div>
  </div>
</div>
%% views/footer.html %%
