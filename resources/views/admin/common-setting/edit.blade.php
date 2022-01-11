<!-- reference model -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="referenceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="referenceModalLabel">{{__('Edit Expense')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="expenseId" name="id">
                    @csrf
                    @php
                    $subject = DB::table('subjects')
                        ->where('status', '1')
                        ->get();
                    @endphp
                    <div class="form-group">
                        <label>course : </label>
                        <select name="subject_id" id="subject_id" class="form-control subject_id">
                            <option value="">Select Subject</option>
                            @foreach ($subject as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="form-group">
                    <label>Email:</label>
                        <input type="number" name="marks" id="marks" class="form-control marks" placeholder="Enter Marks." autocomplete="off" />
                        <span class="error-msg text-danger"></span>
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
