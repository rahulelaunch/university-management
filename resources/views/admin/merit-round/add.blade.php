<!-- reference model -->
<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="referenceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="referenceModalLabel">Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form id="expenseForm">
                    @csrf
                    @php
                    $course = DB::table('courses')
                        ->where('status', '1')
                        ->get();
                    @endphp
                    <div class="form-group">
                    <label>Round No:</label>
                        <input type="number" name="round_no" class="form-control" placeholder="Enter Round No." value="{{old('round_no')}}" autocomplete="off" />
                        <span class="error-msg text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>course : </label>
                        <select name="course_id" id="course_id" class="form-control">
                            <option value="">Select Subject</option>
                            @foreach ($course as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                    <label>Start Date:</label>
                        <input type="date" name="start_date" class="form-control" placeholder="Enter Start Date." value="{{old('start_date')}}" autocomplete="off" />
                        <span class="error-msg text-danger"></span>
                    </div>

                    <div class="form-group">
                    <label>End Date:</label>
                        <input type="date" name="end_date" class="form-control" placeholder="Enter Start Date." value="{{old('start_date')}}" autocomplete="off" />
                        <span class="error-msg text-danger"></span>
                    </div>

                    <div class="form-group">
                    <label>Declare Merit Date:</label>
                        <input type="date" name="merit_result_declare_date" class="form-control" placeholder="Enter Declare Date." value="{{old('start_date')}}" autocomplete="off" />
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