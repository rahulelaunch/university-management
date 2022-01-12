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
                        <label>course : </label>
                        <select name="course_id" id="course_id" class="form-control course_id">
                            <option value="">Select Subject</option>
                            @foreach ($course as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Merit Seat:</label>
                        <input type="number" name="merit_seat" class="form-control merit_seat" placeholder="Enter Merit Seat." value="{{old('name')}}" autocomplete="off" />
                        <span class="error-msg text-danger"></span>
                    </div>

                    <div class="form-group">
                    <label>Reserved Seat:</label>
                        <input type="number" name="reserved_seat" class="form-control reserved_seat" placeholder="Enter Reserved Seat." value="{{old('name')}}" autocomplete="off" />
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
