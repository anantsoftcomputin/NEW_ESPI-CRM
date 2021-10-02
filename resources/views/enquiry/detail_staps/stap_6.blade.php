<div class="row">
    <div class="col-md-6">
      <h2 class="mt-4">Standalone Image Button</h2>
      <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
            <i class="fa fa-picture-o"></i> Choose
          </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="filepath">
      </div>
      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
    </div>
    <div class="col-md-6">
      <h2 class="mt-4">Standalone Image Button</h2>
      <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
            <i class="fa fa-picture-o"></i> Choose
          </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="filepath">
      </div>
      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
      <h2 class="mt-4">Standalone File Button</h2>
      <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary text-white">
            <i class="fa fa-picture-o"></i> Choose
          </a>
        </span>
        <input id="thumbnail2" class="form-control" type="text" name="filepath">
      </div>
      <div id="holder2" style="margin-top:15px;max-height:100px;"></div>
    </div>
    <div class="col-md-6">
        <div class="input-group mb-4">
            <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
            <div class="input-group-append">
              <button type="button" class="btn btn-outline-info">Upload</button>
            </div>
          </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Passport</label>
            <input type="file" id="photo" name="Passport" class="form-control" accept="image/png, image/jpeg">
        </div>
    </div>

    <div class="col-md-6">
        <div id="parsed"></div>
    </div>
    <div class="col-md-6">
        <div id="detected"></div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="name">10th Documents</label>
            <input type="file" name="10TH" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">12th Documents</label>
            <input type="file" name="12TH" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Diploma Documents</label>
            <input type="file" name="Diploma" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Bachelor Degree Documents</label>
            <input type="file" name="Bachelor" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Master Degree Documents</label>
            <input type="file" name="Master" class="form-control">
        </div>
    </div>
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
