<!-- Add Asset Modal -->
<div id="create-assets" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Asset</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('storeAssets') }}" id="addAssets" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Asset User</label>
                                <select class="select" name="asset_user" id="addAssetUser">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Asset</label>
                                <input class="form-control" type="text" name="asset_name" id="addAssetName">
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Asset Id</label>
                                <input class="form-control" type="hidden" name="asset_id" id="addIdAsset">
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Model</label>
                                <input class="form-control" type="text" name="model" id="addAssetModel">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Serial Number</label>
                                <input class="form-control" type="text" name="serial_number" id="addAssetSerial">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Supplier</label>
                                <input class="form-control" type="text" name="supplier" id="addAssetSupplier">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Condition</label>
                                <input class="form-control" type="text" name="condition" id="addAssetCondition">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Purchase Date</label>
                                <input class="form-control datetimepicker" type="text" name="purchase_date"
                                    id="addAssetPurchase">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Warranty</label>
                                <input class="form-control datetimepicker" type="text" name="warranty"
                                    id="addAssetWarranty">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Warranty End</label>
                                <input class="form-control datetimepicker" type="text" name="warranty_end"
                                    id="addAssetWarrantyEnd">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" type="text" name="price" id="addAssetPrice">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select" name="status" id="addAssetStatus">
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="returned">Returned</option>
                                </select>
                            </div>
                        </div>

                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Asset Modal -->
