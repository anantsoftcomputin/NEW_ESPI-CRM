<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddAssessments extends Mailable
{
    use Queueable, SerializesModels;
    public $enquiry;
    public $assessment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($enq,$assessment)
    {
        $this->enquiry = $enq;
        $this->assessment = $assessment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data=[
            'details' => $this->enquiry,
            'assessments' => $this->assessment,
        ];
        return $this->markdown('emails.AddAssessmentMailToStudent')->with($data);
    }
}
