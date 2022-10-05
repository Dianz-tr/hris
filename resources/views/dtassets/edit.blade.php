<!-- Edit Asset Modal -->
<div id="edit-assets{{ $asset->id }}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Asset</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateAssets', ['id' => isset($asset) ? $asset->id : '']) }}" method="POST">
                    {{ csrf_field() }}
                    {{-- {{ method_field('PUT') }} --}}
                    <input type="hidden" name="id" id="editAssetId">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Asset User</label>
                                <select class="select form-control" name="asset_user" id="editAssetUser">
                                    {{-- @if (count($users) > 0) --}}
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ ($user->id == isset($asset) ? $asset->asset_user : '') ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Asset</label>
                                <input class="form-control" type="text" name="asset_name" id="editAssetName"
                                    value="{{ isset($asset) ? $asset->asset_name : '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Asset Id</label>
                                <input class="form-control" type="text" name="asset_id" id="editIdAsset"
                                    value="{{ isset($asset) ? $asset->asset_id : '-' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Model</label>
                                <input class="form-control" type="text" name="model" id="editAssetModel"
                                    value="{{ isset($asset) ? $asset->model : '-' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Serial Number</label>
                                <input class="form-control" type="text" name="serial_number" id="editAssetSerial"
                                    value="{{ isset($asset) ? $asset->serial_number : '-' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Supplier</label>
                                <input class="form-control" type="text" name="supplier" id="editAssetSupplier"
                                    value="{{ isset($asset) ? $asset->supplier : '-' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Condition</label>
                                <input class="form-control" type="text" name="condition" id="editAssetCondition"
                                    value="{{ isset($asset) ? $asset->condition : '-' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Purchase Date</label>
                                <input class="form-control" type="text" name="purchase_date" id="editAssetPurchase"
                                    value="{{ isset($asset) ? $asset->purchase_date : '-' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Warranty</label>
                                <input class="form-control" type="text" name="warranty" id="editAssetWarranty"
                                    value="{{ isset($asset) ? $asset->warranty : '-' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Warranty End</label>
                                <input class="form-control" type="text" name="warranty_end" id="editAssetWarrantyEnd"
                                    value="{{ isset($asset) ? $asset->warranty_end : '-' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" type="text" name="price" id="editAssetPrice"
                                    value="{{ isset($asset) ? $asset->price : '-' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select   form-control" name="status" id="editAssetStatus">
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="returned">Returned</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Asset Modal -->
