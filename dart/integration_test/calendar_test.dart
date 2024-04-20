
import 'package:chuva_dart/main.dart';
import 'package:chuva_dart/screens/calendar/controller/controller_calendar.dart';
import 'package:chuva_dart/screens/calendar/calendar.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:get/get.dart';
import 'package:integration_test/integration_test.dart';

final controller = Get.put(CalendarController());

void main() {
  IntegrationTestWidgetsFlutterBinding.ensureInitialized();

  group('Calendar page', () {
    testWidgets('Valida estado inicial', (WidgetTester tester) async {
      await tester.pumpWidget(const ChuvaDart());
      await controller.getPapers();
      await tester.pumpAndSettle();
      expect(find.text('Programação'), findsOneWidget);
      expect(find.text('Nov 2023'), findsOneWidget);
      expect(find.text('26'), findsOneWidget);
      expect(find.text('28'), findsOneWidget);
      expect(find.text('Mesa redonda de 07:00 até 08:00'), findsOneWidget);
    });

    testWidgets(
        'Seleciona dia 28 e verifica que a mesa redonda foi renderizada',
        (WidgetTester tester) async {
      await tester.pumpWidget(const ChuvaDart());
      await controller.getPapers();
      await tester.pumpAndSettle();
      // Check that 'Analisando Estruturas Alienígenas: Uma Visão Teórica' is not on the screen before tapping '28'.
      expect(find.text('Analisando Estruturas Alienígenas: Uma Visão Teórica'),
          findsNothing);
      await expectLater(
        find.byType(Calendar),
        matchesGoldenFile('../screenshots/CalendarPage-Day26.png'),
      );

      // Tap on the '28'.
      await tester.tap(find.text('28'));
      await tester.pumpAndSettle();

      await expectLater(
        find.byType(Calendar),
        matchesGoldenFile('../screenshots/CalendarPage-Day28.png'),
      );

      await tester.pumpAndSettle();

      // Then check if 'Analisando Estruturas Alienígenas: Uma Visão Teórica' appears.

      expect(find.text('Analisando Estruturas Alienígenas: Uma Visão Teórica'),
          findsOneWidget);
    });
  });
}