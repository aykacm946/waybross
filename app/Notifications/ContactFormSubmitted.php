<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactFormSubmitted extends Notification
{
    use Queueable;

    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Yeni İletişim Formu Mesajı - ' . $this->contact->subject)
            ->greeting('Yeni bir iletişim formu mesajınız var!')
            ->line('İsim: ' . $this->contact->name)
            ->line('E-posta: ' . $this->contact->email)
            ->line('Telefon: ' . ($this->contact->phone ?: 'Belirtilmemiş'))
            ->line('Konu: ' . $this->contact->subject)
            ->line('Mesaj:')
            ->line($this->contact->message)
            ->action('Mesajı Görüntüle', url('/admin/contacts/' . $this->contact->id))
            ->line('Teşekkürler!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'contact_id' => $this->contact->id,
            'name' => $this->contact->name,
            'email' => $this->contact->email,
        ];
    }
}
