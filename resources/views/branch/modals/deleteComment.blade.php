
    <!-- Modal -->
    <div class="modal fade" id="comment_{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="{{route('comment.delete', $comment->id)}}" method="post">
   @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Comment Delete</h5>
        
      </div>
      <div class="modal-body">
        Are You Sure You want to delete this Comment
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
    </form>
  </div>
</div>
