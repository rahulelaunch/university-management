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
                    $course = DB::table('courses')
                        ->where('status', '1')
                        ->get();
                    @endphp
                    <div class="form-group">
                    <label>Round No:</label>
                        <input type="number" name="round_no" class="form-control round_no" placeholder="Enter Round No." value="{{old('round_no')}}" autocomplete="off" />
                        <span class="error-msg text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>course : </label>
                        <select name="course_id" id="course_id" class="form-control course_id">
                            <option value="">Select Subject</option>
                            @foreach ($course as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                    <label>Start Date:</label>
                        <input type="date" name="start_date" class="form-control start_date" placeholder="Enter Start Date." value="{{old('start_date')}}" autocomplete="off" />
                        <span class="error-msg text-danger"></span>
                    </div>

                    <div class="form-group">
                    <label>End Date:</label>
                        <input type="date" name="end_date" class="form-control end_date" placeholder="Enter Start Date." value="{{old('start_date')}}" autocomplete="off" />
                        <span class="error-msg text-danger"></span>
                    </div>

                    <div class="form-group">
                    <label>Declare Merit Date:</label>
                        <input type="date" name="merit_result_declare_date" class="form-control merit_result_declare_date" placeholder="Enter Declare Date." value="{{old('start_date')}}" autocomplete="off" />
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
