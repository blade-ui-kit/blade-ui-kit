<div
    x-data="{
        timer: {
            days: '{{ $days() }}',
            hours: '{{ $hours() }}',
            minutes: '{{ $minutes() }}',
            seconds: '{{ $seconds() }}',
        },
        formatCounter(number) {
            return number.toString().padStart(2, '0');
        }
    }"
    x-init="
        let runningCounter = setInterval(() => {
            let countDownDate = new Date({{ $expires->timestamp }} * 1000).getTime();
            let timeDistance = countDownDate - new Date().getTime();

            if (timeDistance < 0) {
                clearInterval(runningCounter);

                return;
            }

            timer.days = formatCounter(Math.floor(timeDistance / (1000 * 60 * 60 * 24)));
            timer.hours = formatCounter(Math.floor((timeDistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
            timer.minutes = formatCounter(Math.floor((timeDistance % (1000 * 60 * 60)) / (1000 * 60)));
            timer.seconds = formatCounter(Math.floor((timeDistance % (1000 * 60)) / 1000));
        }, 1000);
    "
    {{ $attributes }}
>
    @if ($slot->isEmpty())
        <span x-text="timer.days">{{ $days() }}</span> :
        <span x-text="timer.hours">{{ $hours() }}</span> :
        <span x-text="timer.minutes">{{ $minutes() }}</span> :
        <span x-text="timer.seconds">{{ $seconds() }}</span>
    @else
        {{ $slot }}
    @endif
</div>
