
import 'package:chuva_dart/Home/pages/calendar.dart';
import 'package:go_router/go_router.dart';

final routes = GoRouter(
    routes: [
      GoRoute(
          path: '/',
        builder: (context, state) => const Calendar()
      ),
    ]
);