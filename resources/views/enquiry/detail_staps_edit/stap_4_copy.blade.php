<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Exam Status {{ $last->exam_status }}</label>
            <select class="form-control" id="exam_status" name="exam_status" onchange="toggle_exam_status(this)">
                <option value="">Select Exam Status</option>
                <option @if($last->exam_status == "Completed") selected @endif value="Completed">Completed</option>
                <option @if($last->exam_status == "Planning") selected @endif value="Planning">Planning</option>
                <option @if($last->exam_status == "NotPlanning") selected @endif value="NotPlanning">Still Not Planning</option>
            </select>
            {{-- <select class="form-control" name="last_education" onchange="toggle_last_education(this)">
               <option value="">Select Last Educatuion</option>
               <option value="10th">10th</option>
               <option value="Diploma">Diploma</option>
               <option value="12th">12th</option>
               <option value="Graduate">Graduate</option>
               <option value="Master">Master</option>
               <option value="PHD">PHD</option>
           </select> --}}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Type of Exam</label>
            <select name="exam_type" id="exam_type" class="form-control">
                    <option value="">Type of exam</option>
                    <option value="IELTS">IELTS</option>
                    <option value="TOEFL">TOEFL</option>
                    <option value="SAT">SAT</option>
                    <option value="GRE">GRE</option>
                    <option value="GMAT">GMAT</option>
                    <option value="PTE">PTE</option>
                    <option value="UKVI">UKVI</option>
                    <option value="IELTS GENERAL">IELTS GENERAL</option>
                    <option value="DUOLINGO">DUOLINGO</option>
                    <option value="SPOKEN ENGLISH">SPOKEN ENGLISH</option>
            </select>
        </div>
    </div>
</div>

<div class="row exam_score" style="display:none">
    <div class="col-md-12" style="display:none" id="communication_skill_msg">
        Communication Skills
        <hr>
    </div>
    <div class="col-md-6 " id="exam_listening_div">
        <div class="form-group">
            <label for="name">Listening</label>
            <input type="text" name="exam_listening" id="exam_listening" class="form-control">
        </div>
    </div>
    <div class="col-md-6 " id="exam_speaking_div">
        <div class="form-group">
            <label for="name">Speaking</label>
            <input type="text" name="exam_speaking" id="exam_speaking" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_reading_div">
        <div class="form-group">
            <label for="name">Reading</label>
            <input type="text" name="exam_reading" id="exam_reading" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_writing_div">
        <div class="form-group">
            <label for="name">Writing</label>
            <input type="text" name="exam_writing" id="exam_writing" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_math_div">
        <div class="form-group">
            <label for="name">Math</label>
            <input type="text" name="exam_math" id="exam_math" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_evidence_based_reading_writing_div">
        <div class="form-group">
            <label for="name">Evidence-Based Reading and Writing</label>
            <input type="text" name="exam_evidence_based_reading_writing" id="exam_evidence_based_reading_writing" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_essay_div">
        <div class="form-group">
            <label for="name">Essay (optional)</label>
            <input type="text" name="exam_essay" id="exam_essay" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_verbal_reasoning_div">
        <div class="form-group">
            <label for="name">Verbal Reasoning</label>
            <input type="text" name="exam_verbal_reasoning" id="exam_verbal_reasoning" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_quantitative_reasoning_div">
        <div class="form-group">
            <label for="name">Quantitative Reasoning</label>
            <input type="text" name="exam_quantitative_reasoning" id="exam_quantitative_reasoning" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_analytical_writing_div">
        <div class="form-group">
            <label for="name">Analytical Writing</label>
            <input type="text" name="exam_analytical_writing" id="exam_analytical_writing" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_integrated_reasoning_div">
        <div class="form-group">
            <label for="name">Integrated Reasoning</label>
            <input type="text" name="exam_integrated_reasoning" id="exam_integrated_reasoning" class="form-control">
        </div>
    </div>

    <div class="col-md-12" style="display:none" id="enable_skill_msg">
        Enabling Skills
        <hr>
    </div>
    <div class="col-md-6 " id="exam_grammar_div">

        <div class="form-group">
            <label for="name">Grammar</label>
            <input type="text" name="exam_grammar" id="exam_grammar" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_fluency_div">
        <div class="form-group">
            <label for="name">Fluency</label>
            <input type="text" name="exam_fluency" id="exam_fluency" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_pronunciation_div">
        <div class="form-group">
            <label for="name">Pronunciation</label>
            <input type="text" name="exam_pronunciation" id="exam_pronunciation" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_spelling_div">
        <div class="form-group">
            <label for="name">Spelling</label>
            <input type="text" name="exam_spelling" id="exam_spelling" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id='exam_vocabulary_div'>
        <div class="form-group">
            <label for="name">Vocabulary</label>
            <input type="text" name="exam_vocabulary" id="exam_vocabulary" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_written_disclosure_div">
        <div class="form-group">
            <label for="name">Written Disclosure</label>
            <input type="text" name="exam_written_disclosure" id="exam_written_disclosure" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_literacy_div">
        <div class="form-group">
            <label for="name">Literacy</label>
            <input type="text" name="exam_literacy" id="exam_literacy" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_conversation_div">
        <div class="form-group">
            <label for="name">Conversation</label>
            <input type="text" name="exam_conversation" id="exam_conversation" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_comprehension_div">
        <div class="form-group">
            <label for="name">Comprehension</label>
            <input type="text" name="exam_comprehension" id="exam_comprehension" class="form-control">
        </div>
    </div>

    <div class="col-md-6 " id="exam_production_div">
        <div class="form-group">
            <label for="name">Production</label>
            <input type="text" name="exam_production" id="exam_production" class="form-control">
        </div>
    </div>

</div>


<div class="row hiddan_data_data" style="display:none;">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Planning Date</label>
            <input type="date" name="planning_date" id="name" class="form-control" required="">
        </div>
    </div>
</div>
