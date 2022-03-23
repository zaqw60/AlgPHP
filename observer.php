<?php
interface SplSubject
{
    // Присоединяет наблюдателя к издателю.
    public function attach();
    // Отсоединяет наблюдателя от издателя.
    public function detach();
    // Уведомляет всех наблюдателей о событии.
    public function notify();
}

interface SplObserver
{
    public function update();
}

class Subject implements SplSubject
{
    public $vacancy = [];
    private $observers = [];

    /**
     * Методы управления подпиской.
     */
    public function attach(SplObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer): void
    {
        foreach ($this->observers as $observ){
            if ($observ === $observer) {
                unset($observ);
            }
        }

    }

    /**
     * Запуск обновления в каждом подписчике.
     */
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * отправление уведомления всякий раз, когда появляется новая вакансия
     */
    public function addVacancy($vacancy): void
    {
        $this->vacancy[] = $vacancy;
        $this->notify();
    }
}

class Observer implements SplObserver
{
    private $name;
    private $email;
    private $experience;

    public function __construct(string $name, string $email, int $experience)
    {
        $this->experience = $name;
        $this->email = $email;
        $this->experience = $experience;
    }

    public function update(): void
    {

    }
}

$subject = new Subject();
$obs = new Observer('Иван', zzz@mail.ru, 10);
$subject->attach($obs);
$subject->addVacancy('vacancy');
$subject->detach($obs);