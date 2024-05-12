import 'package:chuva_dart/configs/hive_config.dart';
import 'package:chuva_dart/data/repositories/activities_repository.dart';
import 'package:chuva_dart/routes/routes.dart';
import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';

import 'package:provider/provider.dart';

Future<void> main() async {
  WidgetsFlutterBinding.ensureInitialized();
  try {
    await HiveConfig.start();
  } catch (e) {
    print('Error initializing Hive: $e');
  }
  runApp(const ChuvaDart());
}

class ChuvaDart extends StatelessWidget {
  const ChuvaDart({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MultiProvider(
        providers: [
          ChangeNotifierProvider(create: (_) => ActivitiesRepository()),
        ],
      child: MaterialApp.router(
        title: 'Flutter Demo',
        debugShowCheckedModeBanner: false,
        theme: ThemeData(
          textTheme: TextTheme(
            titleLarge: const TextStyle(
              height: 1.2,
              fontSize: 18,
              fontWeight: FontWeight.w400,
            ),
            headlineLarge:
            const TextStyle(fontWeight: FontWeight.bold, fontSize: 22, height: 1),
            bodyMedium: const TextStyle(
              fontSize: 12,
              fontWeight: FontWeight.w500,
              color: Colors.black,
            ),
            bodyLarge: TextStyle(
              color: fromCssColor("#737373"),
            ),
            headlineMedium: const TextStyle(fontSize: 27, height: 1.1),
            headlineSmall:  const TextStyle(fontWeight: FontWeight.w300, fontSize: 22),
          ),
          elevatedButtonTheme: ElevatedButtonThemeData(
            style: ButtonStyle(
              shape: MaterialStatePropertyAll(
                  RoundedRectangleBorder(borderRadius: BorderRadius.circular(5))),
              iconColor: const MaterialStatePropertyAll(Colors.white),
              backgroundColor: MaterialStateProperty.all(fromCssColor("#306dc3")),
            ),
          ),
          appBarTheme: const AppBarTheme(
              foregroundColor: Color.fromARGB(255, 69, 97, 137)),
          tabBarTheme: TabBarTheme(labelColor: fromCssColor("#306dc3")),
          colorScheme: ColorScheme.fromSeed(
            seedColor: const Color.fromARGB(255, 69, 97, 137),
          ),
          useMaterial3: true,
        ),
        routerDelegate: routes.routerDelegate,
        routeInformationParser: routes.routeInformationParser,
        routeInformationProvider: routes.routeInformationProvider,
      ),
    );
  }
}
