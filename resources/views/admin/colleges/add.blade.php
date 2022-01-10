<!-- reference model -->
<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="referenceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="referenceModalLabel">College</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form id="expenseForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label>Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter College name." value="{{old('name')}}" autocomplete="off" />
                        <span class="error-msg text-danger"></span>
                    </div>
                    <div class="form-group">
                    <label>Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter College Email." value="{{old('email')}}" autocomplete="off" />
                        <span class="error-msg text-danger"></span>
                    </div>
                    <div class="form-group">
                    <label>Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter College Password." value="{{old('password')}}" autocomplete="off" />
                        <span class="error-msg text-danger"></span>
                    </div>
                    <div class="form-group">
                    <label>Contact No:</label>
                        <input type="number" name="contact_no" class="form-control" placeholder="Enter College Contact no.." value="{{old('contact_no')}}" autocomplete="off" />
                        <span class="error-msg text-danger"></span>
                    </div>

                    <div class="form-group">
                    <label>Address:</label>
                        <textarea id="address" name="address" class="form-control" placeholder="Enter address " rows="3">{{old('address')}}</textarea>
                        <span class="error-msg text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label>Logo:</label>
                        <input type="file" name="logo" id="logo" class="form-control" />
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn  btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" data-dismiss="modal" class="btn reset-expenses-btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>