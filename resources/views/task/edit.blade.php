@extends('layouts.app')

@section('content')
    
<div class="modal-body">
    <form id="edit_task_modal">
        
        {{ csrf_field() }} 
        {{ method_field('put')}}
         
        <div class="form-group row">
            <label class="col-lg-12 control-label">Jumlah</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name="jumlah"
                    id="editExpensesJumlah">
            </div>
        </div>
        
        <div class="submit-section text-center">
            <a href="{{ route('storeTask')}}"></a>
            <button class="btn btn-primary submit-btn">Simpan</button>
        </div>
    </form>
</div>

@endsection
