{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]) !!}

<button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal{{$id_item_masuk}}">Detail</button>  |
<a href="{{ $edit_url }}" class="btn btn-sm btn-success">Ubah</a> |

{!! Form::submit('Hapus',['class'=>'btn btn-sm btn-danger js-confirm']) !!}
{!! Form::close() !!}
<!-- MODAL PILIH PRODUK -->
  <div class="modal " id="myModal{{$id_item_masuk}}" role="dialog" data-backdrop="">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail</h4>
        </div>
        <div class="modal-body"> 

        </div>  
        </div>
      </div>
      
    </div>
  </div>
<!-- / MODAL PILIH PRODUK -->
