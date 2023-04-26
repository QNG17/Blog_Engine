%% views/header.html %%

<div class="row">
  <div class="col-lg-12">
    <h1>{{$title}}</h1>
    <form action="/post/add" method="post">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Post title" value="{{$post['title']}}">
      </div>
      <div class="form-group">
        <label for="tags">Tags</label>
        <input type="text" class="form-control" id="tags" name="tags" placeholder="Post tags (comma separated list)" value="{{$post['tags']}}">
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" rows="10" value="{{$post['content']}}">{{$post['content']}}</textarea>
      </div>
      <div class="form-group mt-4">
        <div class="btn-toolbar align-middle">
          <button type="submit" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between"><span class="material-icons">send</span>&nbsp;Submit</button>
          <button class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="get('/index.php')"><span class="material-icons">cancel</span>&nbsp;Cancel</button>
        </div>
      </div>
      <input type="hidden" id="datestamp" name="datestamp" value="{{$post['datestamp']}}" />
    </form>
  </div>
</div>

%% views/footer.html %%
