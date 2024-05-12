import 'package:json_annotation/json_annotation.dart';

part 'description.g.dart';

@JsonSerializable()
class Description {
  @JsonKey(fromJson: _descriptionFromJson , name: 'pt-br')
  String? ptBr;

  Description({this.ptBr});

  static String _descriptionFromJson(dynamic json) {
    if (json is Map<String, dynamic>) {
      return json['pt-br'] ??= '';
    } else if (json is String) {
      return json;
    } else {
      return '';
    }
  }

  factory Description.fromJson(Map<String, dynamic> json) => _$DescriptionFromJson(json);
  Map<String, dynamic> toJson() => _$DescriptionToJson(this);
}
