
import 'package:chuva_dart/Activity/activity.dart';
import 'package:chuva_dart/Home/pages/calendar.dart';
import 'package:chuva_dart/Speaker/speaker.dart';

import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';

final routes = GoRouter(

    routes: [
      GoRoute(
          path: '/',
        builder: (context, state) => const Calendar(),
      ),
      GoRoute(
          path: '/activities',
        builder: (BuildContext context, GoRouterState state) {
          final items = state.extra as Activity;
          return Activity(items: items.items, activities: items.activities,);
        },
      ),
      GoRoute(
        path: '/palestrantes',
        builder: (BuildContext context, GoRouterState state) {
          final speaker = state.extra as Speaker;
          return Speaker(speaker: speaker.speaker, activities: speaker.activities, listActivities: speaker.listActivities,);
        },
      )
    ]
);