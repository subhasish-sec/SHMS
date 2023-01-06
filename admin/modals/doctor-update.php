<div class="modal fade" id="edit_doctor_modal" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Specialities</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td>
                            <label for="edit_specialization">Specialization</label>
                            <div class="form-group">
                                <input type="hidden" name="editSpecId" class="editSpecId">
                                <input type="text" class="form-control" name="editSpecVal" id="edit_specialization"
                                    placeholder="Enter specialization...">
                            </div>
                            <button type="submit" class="btn btn-primary editSpec w-100">Edit</button>
                            <div class="editSpecMsg"></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>