import 'package:chuva_dart/main.dart';
import 'package:chuva_dart/screens/activity.dart';
import 'package:chuva_dart/screens/calendar/controller/controller_calendar.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:get/get.dart';
import 'package:integration_test/integration_test.dart';

void main() {
  IntegrationTestWidgetsFlutterBinding.ensureInitialized();

  group('Activity page', () {
    late CalendarController controller;

    setUp(() {
      controller = CalendarController();
      Get.put(controller);
    });

    testWidgets('Verifica elementos da atividade', (WidgetTester tester) async {
      await tester.pumpWidget(const ChuvaDart());

      // Aguarde a inicialização do controlador e carregamento dos dados
      await controller.getPapers();
      await tester.pumpAndSettle();

      // Abra a página da atividade
      await tester.tap(find.text('Mesa redonda de 07:00 até 08:00'));
      await tester.pumpAndSettle();

      // Verifique elementos na página
      expect(find.byType(Activity), findsOneWidget);
      expect(find.text('Astrofísica e Cosmologia'), findsOneWidget);
      expect(find.text('Maputo'), findsOneWidget);
      expect(find.text('Adicionar à sua agenda'), findsOneWidget);
      expect(find.text('Stephen William Hawking'), findsOneWidget);

      // Capture a primeira imagem golden
      await expectLater(
        find.byType(Activity),
        matchesGoldenFile('../screenshots/ActivityPage-Unfavorited.png'),
      );

      // Simule adicionar à agenda
      await tester.tap(find.text('Adicionar à sua agenda'));
      await tester.pump(); // Aguarde a animação da transição
      await tester.pump(const Duration(seconds: 2)); // Aguarde o tempo necessário

      // Verifique se o botão mudou para "Remover da sua agenda"
      expect(find.text('Remover da sua agenda'), findsOneWidget);

      // Capture a segunda imagem golden
      await expectLater(
        find.byType(Activity),
        matchesGoldenFile('../screenshots/ActivityPage-Favorited.png'),
      );
    });
  });
}
