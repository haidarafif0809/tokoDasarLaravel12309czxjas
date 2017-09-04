<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal{{$id_produk}}">List</button>  
 
  <!-- Modal -->
  <div class="modal " id="myModal{{$id_produk}}" role="dialog" data-backdrop="">
    <div class="modal-dialog modal-sm">
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">List Harga Jual 2 - 7</h4>
        </div>
        <div class="modal-body"> 
           <table class="table table-bordered"> 
            <tr>
              <th>Harga Jual 2</th>
              <td>{{  number_format($model->harga_jual2,0,',','.') }}</td> 
            </tr>
            <tr>
              <th>Harga Jual 3</th>
              <td>{{ number_format($model->harga_jual3,0,',','.') }}</td>
            </tr> 
            <tr>
              <th>Harga Jual 4</th>
              <td>{{ number_format($model->harga_jual4,0,',','.') }}</td> 
            </tr>
            <tr>
              <th>Harga Jual 5</th>
              <td>{{ number_format($model->harga_jual5,0,',','.') }}</td>
            </tr> 
            <tr>
              <th>Harga Jual 6</th>
              <td>{{ number_format($model->harga_jual6,0,',','.') }}</td> 
            </tr>
            <tr>
              <th>Harga Jual 7</th>
              <td>{{ number_format($model->harga_jual7,0,',','.') }}</td>
            </tr> 
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 