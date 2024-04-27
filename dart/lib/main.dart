import 'package:chuva_dart/configs/hive_config.dart';
import 'package:chuva_dart/routes/routes.dart';
import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';


Future<void> main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await HiveConfig.start();
  runApp(const ChuvaDart());
}

class ChuvaDart extends StatelessWidget {
  const ChuvaDart({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp.router(
      title: 'Flutter Demo',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        textTheme: const TextTheme(
          titleLarge: TextStyle(
            height: 1.2,
            fontSize: 18,
            fontWeight: FontWeight.w400,
          ),
          headlineLarge: TextStyle(
            fontWeight: FontWeight.bold,
            fontSize: 22,
          ),
          bodyMedium: TextStyle(
            fontSize: 12, // Tamanho da fonte
            fontWeight: FontWeight.w500, // Peso da fonte
            color: Colors.black, // Cor do texto
            // fontFamily: 'Serif',
          )
        ),
        elevatedButtonTheme: ElevatedButtonThemeData(
          style: ButtonStyle(
            shape: MaterialStatePropertyAll(RoundedRectangleBorder(borderRadius: BorderRadius.circular(5))),
            iconColor: const MaterialStatePropertyAll(Colors.white),
            backgroundColor: MaterialStateProperty.all(fromCssColor("#306dc3")),
          ),
        ),

        appBarTheme: const AppBarTheme(foregroundColor: Color.fromARGB(255, 69,97,137)),
        tabBarTheme: TabBarTheme(labelColor: fromCssColor("#306dc3")),
        colorScheme: ColorScheme.fromSeed(seedColor: const Color.fromARGB(255, 69,97,137),
      ),
        useMaterial3: true,
      ),
      routerDelegate: routes.routerDelegate,
      routeInformationParser: routes.routeInformationParser,
      routeInformationProvider: routes.routeInformationProvider,
    );
  }
}


