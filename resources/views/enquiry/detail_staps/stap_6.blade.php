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
            <input type="text" id="thumbnail_bachelor" class="form-control" aria-label="Text" placeholder="Bachelor Documents" name="bachelor_file" readonly>
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
    <div class="col-md-6">
        <div class="input-group mb-4">
            <input type="text" id="thumbnail_phd" class="form-control" aria-label="Text" placeholder="PhD / Doctorate Degree Documents" name="phd_file" readonly>
            <div class="input-group-append">
                <a id="phd_file" data-input="thumbnail_phd" data-preview="holder_phd" class="btn btn-primary text-white">
                    PDH Documents
                </a>
            </div>
          </div>
        <div id="holder_phd" style="margin-top:15px;max-height:100px;"></div>
    </div>
    <div class="col-md-6">
        <div class="input-group mb-4">
            <input type="text" id="thumbnail_transcript" class="form-control" aria-label="Text" placeholder="Transcript Document(University)" name="transcript_file" readonly>
            <div class="input-group-append">
                <a id="transcript_file" data-input="thumbnail_transcript" data-preview="holder_transcript" class="btn btn-primary text-white">
                    Transcript Documents
                </a>
            </div>
          </div>
        <div id="holder_transcript" style="margin-top:15px;max-height:100px;"></div>
    </div>
    {{-- <div class="col-md-6">
        <div class="form-group">
            <label for="name">Marksheets (IELTS/TOEFL/PTE/GRE/GMAT/SAT)</label>
            <input type="file" name="Marksheets" class="form-control">
        </div>
    </div> --}}

    {{-- <div class="col-md-6">
        <div class="form-group">
            <label for="name">Transcript Document(University)</label>
            <input type="file" name="Transcript" class="form-control">
        </div>
    </div> --}}
    <div class="col-md-6">
        <div class="input-group mb-4">
            <input type="text" id="thumbnail_experience" class="form-control" aria-label="Text" placeholder="Work Experience Documents" name="experience_file" readonly>
            <div class="input-group-append">
                <a id="experience_file" data-input="thumbnail_experience" data-preview="holder_experience" class="btn btn-primary text-white">
                    Work Experience Documents
                </a>
            </div>
          </div>
        <div id="holder_experience" style="margin-top:15px;max-height:100px;"></div>
    </div>
    {{-- <div class="col-md-6">
        <div class="form-group">
            <label for="name">Work Experience Documents</label>
            <input type="file" name="Experience" class="form-control">
        </div>
    </div> --}}
    <div class="col-md-6">
        <div class="input-group mb-4">
            <input type="text" id="thumbnail_lor" class="form-control" aria-label="Text" placeholder="LOR Documents" name="lor_file" readonly>
            <div class="input-group-append">
                <a id="lor_file" data-input="thumbnail_lor" data-preview="holder_lor" class="btn btn-primary text-white">
                    LOR
                </a>
            </div>
          </div>
        <div id="holder_lor" style="margin-top:15px;max-height:100px;"></div>
    </div>
    {{-- <div class="col-md-6">
        <div class="form-group">
            <label for="name">LOR</label>
            <input type="file" name="LOR" class="form-control">
        </div>
    </div> --}}
    <div class="col-md-6">
        <div class="input-group mb-4">
            <input type="text" id="thumbnail_resume" class="form-control" aria-label="Text" placeholder="Resume Documents" name="resume_file" readonly>
            <div class="input-group-append">
                <a id="resume_file" data-input="thumbnail_resume" data-preview="holder_resume" class="btn btn-primary text-white">
                    Resume
                </a>
            </div>
          </div>
        <div id="holder_resume" style="margin-top:15px;max-height:100px;"></div>
    </div>
    {{-- <div class="col-md-6">
        <div class="form-group">
            <label for="name">Resume</label>
            <input type="file" name="cv" class="form-control">
        </div>
    </div> --}}
    <div class="col-md-6">
        <div class="input-group mb-4">
            <input type="text" id="thumbnail_other" class="form-control" aria-label="Text" placeholder="Other ( Multiple )" name="other_file" readonly>
            <div class="input-group-append">
                <a id="lfm2" data-input="thumbnail_other" data-preview="holder_other" class="btn btn-primary text-white">
                    Other ( Multiple )
                </a>
            </div>
          </div>
        <div id="holder_other" style="margin-top:15px;max-height:100px;"></div>
    </div>

    {{-- <div class="col-md-6" id="other">
        <div class="form-group">
            <label for="name">Other ( Multiple ) </label>
            <input type="file" name="other[]" class="form-control" multiple="multiple">
        </div>
    </div> --}}
</div>
