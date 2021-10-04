<div class="row">
    <div class="col-md-6">
        <div class="input-group mb-4">
            <input type="text" id="thumbnail" class="form-control" aria-label="Text" placeholder="Select Passport" name="passport_file" readonly>
            <div class="input-group-append">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white lfm">
                   Choose Passport
                </a>
            </div>
          </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
    </div>
    <div class="col-md-6">
        <div class="input-group mb-4">
            <input type="text" id="thumbnail1" class="form-control" aria-label="Text input with segmented dropdown button" placeholder="Select 10th Documents"  name="10th_file" readonly>
            <div class="input-group-append">
                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary text-white lfm">
                   Choose 10th Markseet
                </a>
            </div>
          </div>
        <div id="holder1" style="margin-top:15px;max-height:100px;"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="input-group mb-4">
            <input type="text" id="thumbnail_diploma" class="form-control" aria-label="Text" placeholder="Diploma Documents" name="passport" readonly>
            <div class="input-group-append">
                <a id="diploma_file" data-input="thumbnail_diploma" data-preview="holder_diploma" class="btn btn-primary text-white lfm">
                    Diploma Documents
                </a>
            </div>
          </div>
        <div id="holder_diploma" style="margin-top:15px;max-height:100px;"></div>
    </div>
    <div class="col-md-6">
        <div class="input-group mb-4">
            <input type="text" id="thumbnail_bachelor" class="form-control" aria-label="Text" placeholder="Diploma Documents" name="bachelor_file" readonly>
            <div class="input-group-append">
                <a id="bachelor_file" data-input="thumbnail_bachelor" data-preview="holder_bachelor" class="btn btn-primary text-white">
                    Bachelor Degree Documents
                </a>
            </div>
          </div>
        <div id="holder_bachelor" style="margin-top:15px;max-height:100px;"></div>
    </div>
    {{-- <div class="col-md-6">
        <div class="form-group">
            <label for="name">Bachelor Degree Documents</label>
            <input type="file" name="Bachelor" class="form-control">
        </div>
    </div> --}}
    <div class="col-md-6">
        <div class="input-group mb-4">
            <input type="text" id="thumbnail_master" class="form-control" aria-label="Text" placeholder="Master Documents" name="master_file" readonly>
            <div class="input-group-append">
                <a id="master_file" data-input="thumbnail_master" data-preview="holder_master" class="btn btn-primary text-white">
                    Master Degree Documents
                </a>
            </div>
          </div>
        <div id="holder_master" style="margin-top:15px;max-height:100px;"></div>
    </div>
    {{-- <div class="col-md-6">
        <div class="form-group">
            <label for="name">Master Degree Documents</label>
            <input type="file" name="Master" class="form-control">
        </div>
    </div> --}}
    <div class="col-md-6" style="display: none;">
        <div class="form-group">
            <label for="name">PhD / Doctorate Degree Documents</label>
            <input type="file" name="PhD" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Marksheets (IELTS/TOEFL/PTE/GRE/GMAT/SAT)</label>
            <input type="file" name="Marksheets" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Transcript Document(University)</label>
            <input type="file" name="Transcript" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Work Experience Documents</label>
            <input type="file" name="Experience" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">LOR</label>
            <input type="file" name="LOR" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Resume</label>
            <input type="file" name="cv" class="form-control">
        </div>
    </div>

    <div class="col-md-6" id="other">
        <div class="form-group">
            <label for="name">Other ( Multiple ) </label>
            <input type="file" name="other[]" class="form-control" multiple="multiple">
        </div>
    </div>
</div>
