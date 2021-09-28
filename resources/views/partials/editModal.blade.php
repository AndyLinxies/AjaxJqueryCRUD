
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

                <input  id="stud_id" />

                <div class="form-group mb-3">
                    <label for="name">Full Name</label><br>
                    <input class='edit_name' type="text" id="name" required class="form-control"><br>
                </div>
                <div class="form-group mb-3">
                    <label for="course">Course</label><br>
                    <input class='edit_course' type="text" id="course" required class="form-control"><br>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label><br>
                    <input class='edit_email' type="text" id="email" required class="form-control"><br>
                </div>
                <div class="form-group mb-3">
                    <label for="phone">Phone No</label><br>
                    <input class='edit_phone' type="text" id="phone" required class="form-control"><br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary update_student">Update</button>
            </div>

        </div>
    </div>
</div>