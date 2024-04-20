
import 'package:go_router/go_router.dart';

import '../screens/activity.dart';
import '../screens/author.dart';
import '../screens/calendar/calendar.dart';

final router = GoRouter(
  routes: [
    GoRoute(
      path: '/',
      builder: (context, state) => const Calendar(),
    ),
    GoRoute(
      path: '/activity',
      builder: (context, state) => const Activity(),
    ),
    GoRoute(
      path: '/author',
      builder: (context, state) => const Author(),
    ),
  ],
);