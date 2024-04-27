
import 'package:chuva_dart/Activity/activity.dart';
import 'package:chuva_dart/Home/pages/calendar.dart';
import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';

import '../data/models/activities.dart';

final routes = GoRouter(

    routes: [
      GoRoute(
          path: '/',
        builder: (context, state) => const Calendar(),
      ),
      GoRoute(
          path: '/activities',
        builder: (BuildContext context, GoRouterState state) {
          final items = state.extra as Activities;
          return Activity(items: items);
        },
      ),
      // GoRoute(
      //     path: '/palestrante',
      //     builder: (context, state) => const Activity()
      // ),
    ]
);