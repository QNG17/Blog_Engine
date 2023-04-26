%% views/header.html %%

<div class="row">
  <div class="col-lg-12">
    <h2>Recent posts</h2>
    [[ foreach($posts as $post): ]]
        <div class="row mt-3">
          <div class="card">
            <div class="card-header">
              <a href="post/view/{{$post['id']}}"><h5>{{ $post['title'] }}<span style='float:right;'>{{ time2str($post['datestamp']) }}</span></h5></a>
            </div>
            <hr />
            <div class="card-body">
              <p class="card-text">{{ substr($post['content'], 0, 500) }} <a href='/post/view/{{ $post['id'] }}'>... read more</a></p>
            </div>
            [[ if ($post['tags']): ]]
            <div class="card-footer text-muted">
              Filed under: {{$post['tags']}}
            </div>
            [[ endif; ]]
        </div>
      </div>
    [[ endForeach; ]]
    </div>
  </div>
  <div class="row mt-3">
    <button class="btn btn-sm btn-primary mr-1 d-flex justify-content-center align-content-between" onclick="get('/post/add/')"><span class="material-icons">add_circle_outline</span>&nbsp; Add a post</button>
  </div>
</div>
  
%% views/footer.html %% 
