<div class="modal fade" id="add_doctor_modal" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="docMCloseBtn">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="docAddForm">
                    <div class="form-group">
                        <input type="hidden" name="reqDocAdd" value="doctorAdd">
                        <label for="docEmail">Docotr Email</label>
                        <input type="text" class="form-control" id="docEmail" name="docEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="docFName">Docotr First Name</label>
                        <input type="text" class="form-control" id="docFName" name="docFirstName" required>
                    </div>
                    <div class="form-group">
                        <label for="docMName">Docotr Middle Name</label>
                        <input type="text" class="form-control" id="docMName" name="docMiddleName">
                    </div>
                    <div class="form-group">
                        <label for="docLName">Docotr Last Name</label>
                        <input type="text" class="form-control" id="docLName" name="docLastName" required>
                    </div>
                    <div class="form-group">
                        <label for="docCntNo">Docotr Contact No</label>
                        <input type="text" class="form-control" id="docCntNo" name="docContactNo" required>
                    </div>
                    <div class="form-group">
                        <label for="docPassword">Docotr Password</label>
                        <input type="password" class="form-control" id="docPassword" name="docPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="docCPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="docCPassword" name="docConfirmPassword"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="docBtn">Add</button>
                    <div id="docShowMsg"></div>
                </form>
            </div>
        </div>
    </div>
</div>