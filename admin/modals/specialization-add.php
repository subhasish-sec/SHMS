<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Specialization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="specMCloseBtn">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="specForm">
                    <div class="form-group">
                        <label for="Specialization">Specialization</label>
                        <input type="email" class="form-control" id="Specialization" name="specialization_in">
                        <input type="hidden" name="specialization" value="doctor">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="specBtn">Save
                        Changes</button>
                    <div id="specShowMsg"></div>
                </form>
            </div>
        </div>
    </div>
</div>