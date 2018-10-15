<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\ContactFormRequest;
class Admin extends Model
{
    use Notifiable;

    protected $admin;
    protected $email;
	protected $message;
    public function __construct(contactFormRequest $message)
    {
        $this->message = $message;
      	$this->admin = config('admin.name');
        $this->email = config('admin.email');
 
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject(config('admin.name') . ", you got a new message!")
                    ->greeting(" ")
                    ->salutation(" ")
                    ->from($this->message->email, $this->message->name)
					->line($this->message->message);
    }
    }
