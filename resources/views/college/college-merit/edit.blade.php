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
               
                    <div class="form-group">
                        <label>Course : </label>
                        <select name="course_id" id="course_id" class="form-control course_id">
                            <option value="">Select Subject</option>
                            @foreach ($course as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @php
                    $rounds = DB::table('merit_rounds')
                        ->where('status', '1')
                        ->get();
                    @endphp 
                    <div class="form-group">
                        <label>Round : </label>
                        <select name="round" id="round" class="form-control round">
                            <option value="">Select Subject</option>
                            @foreach ($rounds as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->round_no }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Merit:</label>
                        <input type="number" name="merit" class="form-control merit" placeholder="Enter Merit." value="{{old('merit')}}" autocomplete="off" />
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
