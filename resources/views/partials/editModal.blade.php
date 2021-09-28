
{{-- Edit modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit & Update Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input class="form-control" id="stud_id" />

                <div class="form-group mb-3">
                    <label for="name">Full Name</label>
                    <input  type="text" id="name" required class="form-control edit_name">
                </div>
                <div class="form-group mb-3">
                    <label for="course">Course</label>
                    <input  type="text" id="course" required class="form-control edit_course">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input  type="text" id="email" required class="form-control edit_email">
                </div>
                <div class="form-group mb-3">
                    <label for="phone">Phone No</label>
                    <input  type="text" id="phone" required class="form-control edit_phone">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary update_student">Update</button>
            </div>

        </div>
    </div>
</div>