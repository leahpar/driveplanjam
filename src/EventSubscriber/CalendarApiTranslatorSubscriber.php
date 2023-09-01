<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class CalendarApiTranslatorSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
//            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        // ignore if not an API request
        if (!str_starts_with($request->getPathInfo(), '/api/')) {
            return;
        }

        // ignore if not a GET request
        if ($request->getMethod() !== 'GET') {
            return;
        }

        dump($request->query->all());

        // Convert get params 'start' and 'end' to 'start[after]' and 'end[before]'
        $start = $request->query->get('start');
        $request->query->remove('start');
        $end = $request->query->get('end');
        $request->query->remove('end');
        if (!empty($start) && !empty($end)) {
            $request->query->set('start[before]', $end);
            $request->query->set('end[after]', $start);
        }

        dump($request->query->all());
    }


}
