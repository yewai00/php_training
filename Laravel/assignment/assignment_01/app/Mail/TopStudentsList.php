<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TopStudentsList extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * students collection
     */
    private $students;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Collection $students)
    {
        $this->students = $students;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@studentaffairs.com')
            ->markdown('emails/topstudentslist')
            ->with('students', $this->students);
    }
}
