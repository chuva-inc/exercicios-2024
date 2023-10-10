import 'package:chuva_dart/main.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:integration_test/integration_test.dart';

// Open activity page.
Future<void> loadActivityPage(WidgetTester tester) async {
  await tester.pumpWidget(const ChuvaDart());
  await tester.tap(find.text('28'));
  await tester.pumpAndSettle();
  await tester.tap(find.text('Mesa redonda de 16:30 até 17:30'));
  await tester.pumpAndSettle();
}

void main() {
  IntegrationTestWidgetsFlutterBinding.ensureInitialized();

  group('Activity page', () {
    testWidgets('Verifica elementos da atividade', (WidgetTester tester) async {
      await loadActivityPage(tester);
      await expectLater(
        find.byType(Activity),
        matchesGoldenFile('../screenshots/ActivityPage-Unfavorited.png'),
      );

      expect(find.text('Programação'), findsOneWidget);
      expect(find.text('Mesa redonda'), findsOneWidget);
      expect(find.text('Segunda-feira 16:30h - 17:30h'), findsOneWidget);
      expect(find.text('Adicionar à sua agenda'), findsOneWidget);
    });

    testWidgets('Verifica se favoritar funciona', (WidgetTester tester) async {
      await loadActivityPage(tester);
      await expectLater(
        find.byType(Activity),
        matchesGoldenFile('../screenshots/ActivityPage-Unfavorited.png'),
      );
      await tester.tap(find.text('Adicionar à sua agenda'));
      await tester.pumpAndSettle();

      expect(find.text('Remover da sua agenda'), findsOneWidget);
      await expectLater(
        find.byType(Activity),
        matchesGoldenFile('../screenshots/ActivityPage-Favorited.png'),
      );
    });
  });
}
